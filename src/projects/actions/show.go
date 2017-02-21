package projectactions

import (
	"web/personal/src/lib/authorise"

	"github.com/auenc/personal-site/src/projects"
	"github.com/fragmenta/router"
	"github.com/fragmenta/view"
)

//HandleShow displays a single post
func HandleShow(context router.Context) error {
	//Find the project
	p, err := projects.Find(context.ParamInt("id"))
	if err != nil {
		return router.InternalError(err)
	}

	//Authorise access only if not published
	if !p.IsPublished() {
		err = authorise.Resource(context, p)
		if err != nil {
			return router.NotAuthorizedError(err)
		}
	}

	//Render the template
	view := view.New(context)
	view.AddKey("project", p)
	return view.Render()
}
