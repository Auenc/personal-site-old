package contact

import (
	"fmt"
	"time"
	"web/personal/src/lib/status"

	"github.com/fragmenta/model"
	"github.com/fragmenta/model/validate"
	"github.com/fragmenta/query"
)

//Contact represents messages sent by users of the site wanted to get into contact with the owner.
type Contact struct {
	model.Model
	status.ModelStatus
	FirstName string
	LastName  string
	Email     string
	Message   string
}

//AllowedParams returns a slice of allowed param keys
func AllowedParams() []string {
	return []string{"firstname", "lastname", "email", "message"}
}

//NewWithColumns creates a new contact instance from a map of data
func NewWithColumns(cols map[string]interface{}) *Contact {
	contact := New()
	contact.Id = validate.Int(cols["id"])
	contact.CreatedAt = validate.Time(cols["created_at"])
	contact.FirstName = validate.String(cols["firstname"])
	contact.LastName = validate.String(cols["lastname"])
	contact.Email = validate.String(cols["email"])
	contact.Message = validate.String(cols["message"])
	return contact
}

//New creates and initalises a new Contact instance
func New() *Contact {
	contact := &Contact{}
	contact.Model.Init()
	return contact
}

//Create inserts a new record in the database using params, and returns the new id
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

func validateParams(params map[string]string) error {
	err := validate.Length(params["id"], 0, -1)
	if err != nil {
		return err
	}
	err = validate.Length(params["firstname"], 0, 255)
	if err != nil {
		return err
	}
	err = validate.Length(params["lastname"], 0, 255)
	if err != nil {
		return err
	}
	err = validate.Length(params["email"], 0, -1)
	if err != nil {
		return err
	}
	err = validate.Length(params["message"], 0, -1)
	if err != nil {
		return err
	}

	return err
}

func Find(id int64) (*Contact, error) {
	result, err := Where("id=?", id).FirstResult()
	if err != nil {
		return nil, err
	}
	return NewWithColumns(result), nil
}

//Findall returns a slice of Contacts based on the provided query
func FindAll(q *query.Query) ([]*Contact, error) {
	//Fetch query results from query
	results, err := q.Results()
	if err != nil {
		return nil, err
	}

	//Return an array of contacts
	var contacts []*Contact
	for _, cols := range results {
		con := NewWithColumns(cols)
		contacts = append(contacts, con)
	}

	return contacts, nil
}

//Query returns a new query for contacts
func Query() *query.Query {
	c := New()
	return query.New(c.TableName, c.KeyName)
}

//Where returns a Where query for contacts with the arguments supplied
func Where(format string, args ...interface{}) *query.Query {
	return Query().Where(format, args...)
}

//Update sets the record in the database from params
func (c *Contact) Update(params map[string]string) error {
	//Remove params not in Allowedparams
	params = model.CleanParams(params, AllowedParams())

	//Check params for invalid values
	err := validateParams(params)
	if err != nil {
		return err
	}

	//Update data params
	params["updated_at"] = query.TimeString(time.Now().UTC())

	return Where("id=?", c.Id).Update(params)
}

//Destroy removes the record from the database
func (c *Contact) Destory() error {
	return Where("id=?", c.Id).Delete()
}

//URLShow returns a url with a slug
func (c *Contact) URLShow() string {
	return fmt.Sprintf("/contact/%d-%s-%s", c.ToSlug(c.FirstName), c.ToSlug(c.LastName))
}
