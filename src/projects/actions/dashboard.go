package projectactions

import (
	"fmt"
	"strings"
	"web/personal/src/lib/authorise"

	"github.com/auenc/personal-site/src/projects"
	"github.com/fragmenta/router"
	"github.com/fragmenta/view"
)

//HandleIndex displays a list of projects
func HandleDashboard(context router.Context) error {
	//Authorise
	fmt.Println("Got here")
	err := authorise.Path(context)
	if err != nil {
		return router.NotAuthorizedError(err)
	}

	//Build a query
	q := projects.Query()

	//Order by required order, or default to id asc
	switch context.Param("order") {
	case "1":
		q.Order("created desc")
		break
	case "2":
		q.Order("updated desc")
		break
	case "3":
		q.Order("name asc")
		break
	case "4":
		q.Order("banner desc")
		break
	default:
		q.Order("id asc")
		break
	}

	//Filter if necessary - this assume name and description cols
	filter := context.Param("filter")
	if len(filter) > 0 {
		filter = strings.Replace(filter, "&", "", -1)
		filter = strings.Replace(filter, " ", "", -1)
		filter = strings.Replace(filter, " ", " & ", -1)
		q.Where("(to_tsvector(name) || to_tsvector(description) @@ to_tsquery(?))", filter)
	}

	//Fetch the projects
	results, err := projects.FindAll(q)
	if err != nil {
		router.InternalError(err)
	}

	//Render the template
	view := view.New(context)
	view.AddKey("filter", filter)
	view.AddKey("projects", results)
	return view.Render()
}
