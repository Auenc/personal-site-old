package contactactions

import (
	"strings"
	"web/personal/src/lib/authorise"

	"github.com/auenc/personal-site/src/contact"
	"github.com/fragmenta/router"
	"github.com/fragmenta/view"
)

//HandleDashboard GET request that displays a list of contacts
func HandleDashboard(context router.Context) error {
	//Authorise
	err := authorise.Path(context)
	if err != nil {
		return router.NotAuthorizedError(err)
	}

	//Build a query
	q := contact.Query()

	//Order by required order, or default to id desc
	switch context.Param("order") {
	case "1":
		q.Order("created_at desc")
		break
	case "2":
		q.Order("updated_at desc")
		break
	case "3":
		q.Order("firstname asc")
		break
	case "4":
		q.Order("email asc")
		break
	default:
		q.Order("id desc")
		break
	}

	//Filter if necessary - this assumes first name and last name cols
	filter := context.Param("filter")
	if len(filter) > 0 {
		filter = strings.Replace(filter, "&", "", -1)
		filter = strings.Replace(filter, " ", "", -1)
		filter = strings.Replace(filter, " ", " & ", -1)
		q.Where("(to_tsvector(firstname) || to_tsvector(lastname) @@ to_tsquery(?))", filter)
	}

	//Fetch the contacts
	results, err := contact.FindAll(q)
	if err != nil {
		return router.InternalError(err)
	}

	//Render the template
	view := view.New(context)
	view.AddKey("filter", filter)
	view.AddKey("projects", results)
	return view.Render()
}
