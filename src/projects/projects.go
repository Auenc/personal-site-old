package projects

import (
	"fmt"
	"time"
	"web/personal/src/lib/status"

	"github.com/fragmenta/model"
	"github.com/fragmenta/model/validate"
	"github.com/fragmenta/query"
)

//Project handles saving and retreiving Projects from the database
type Project struct {
	model.Model
	status.ModelStatus
	Name        string
	Summary     string
	Description string
	Image       string
	Banner      bool
}

// AllowedParams returns an array of allowed param keys
func AllowedParams() []string {
	return []string{"status", "name", "summary", "description", "image", "banner"}
}

//NewWithColumns creates a new project instance and fills it with data from the database
func NewWithColumns(cols map[string]interface{}) *Project {
	project := New()
	project.Id = validate.Int(cols["id"])
	project.CreatedAt = validate.Time(cols["created_at"])
	project.UpdatedAt = validate.Time(cols["updated_at"])
	project.Status = validate.Int(cols["status"])
	project.Name = validate.String(cols["name"])
	project.Summary = validate.String(cols["summary"])
	project.Description = validate.String(cols["description"])
	project.Image = validate.String(cols["image"])
	project.Banner = validate.Boolean(cols["banner"])
	return project
}

//New creastes and initialises a new Project instance
func New() *Project {
	project := &Project{}
	project.Model.Init()
	project.Status = status.Draft
	project.TableName = "projects"
	project.Name = "Hello, World!"
	project.Description = "<section class=\"padded\"><h1>Hello, world!</h1><p>Hi</p></section>"
	project.Summary = "<section class=\"padded\"><span>A summary</span></section>"
	return project
}

//Create inserts a new record in the databse using params, and returns the newly created id
func Create(params map[string]string) (int64, error) {
	//Remove params not in AllowedParams
	params = model.CleanParams(params, AllowedParams())

	//Check params for invalid values
	err := validateParams(params)
	if err != nil {
		return 0, err
	}

	//Update data params
	params["created_at"] = query.TimeString(time.Now().UTC())
	params["updated_at"] = query.TimeString(time.Now().UTC())

	return Query().Insert(params)
}

// validateParams checks these params pass validation checks
func validateParams(params map[string]string) error {

	// Now check params are as we expect
	err := validate.Length(params["id"], 0, -1)
	if err != nil {
		return err
	}
	err = validate.Length(params["name"], 0, 255)
	if err != nil {
		return err
	}

	return err
}

//Find returns a single record by id in params
func Find(id int64) (*Project, error) {
	result, err := Query().Where("id=?", id).FirstResult()
	if err != nil {
		return nil, err
	}
	return NewWithColumns(result), nil
}

func FindAll(q *query.Query) ([]*Project, error) {
	//Fetch query.Results from query
	results, err := q.Results()
	if err != nil {
		return nil, err
	}
	//Return an array of projects constructed from the results
	var projs []*Project
	for _, cols := range results {
		p := NewWithColumns(cols)
		projs = append(projs, p)
	}

	return projs, nil
}

//Query returns a new query for projects
func Query() *query.Query {
	p := New()
	return query.New(p.TableName, p.KeyName)
}

//Published returns a query for all posts with status >= published
func Published() *query.Query {
	return Where("status>=", status.Published)
}

//Where returns a Where query for posts with the arguments supplied
func Where(format string, args ...interface{}) *query.Query {
	return Query().Where(format, args...)
}

//Update sets the record in the database from params
func (m *Project) Update(params map[string]string) error {
	//Remove params not in Allowedparams
	params = model.CleanParams(params, AllowedParams())

	//Check params for invalid values
	err := validateParams(params)
	if err != nil {
		return err
	}

	//Update data params
	params["updated_at"] = query.TimeString(time.Now().UTC())

	return Where("id=?", m.Id).Update(params)
}

//Destroy removes the record from the database
func (m *Project) Destroy() error {
	return Where("id=?", m.Id).Delete()
}

//URLShow returns a URL with a slug
func (m *Project) URLShow() string {
	return fmt.Sprintf("/projects/%s", m.ToSlug(m.Name))
}
