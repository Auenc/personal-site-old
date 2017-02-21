package projectactions

import (
	"web/personal/src/lib/authorise"

	"github.com/auenc/personal-site/src/projects"
	"github.com/fragmenta/router"
	"github.com/fragmenta/view"
)

//HandleUpdateShow renders the form to update a post
func HandleUpdateShow(context router.Context) error {
	//Find the project
	p, err := projects.Find(context.ParamInt("id"))
	if err != nil {
		return router.NotFoundError(err)
	}

	//Authorise update project
	err = authorise.Resource(context, p)
	if err != nil {
		return router.NotAuthorizedError(err)
	}

	//Render the template
	view := view.New(context)
	view.AddKey("project", p)
	return view.Render()
}

//HandleUpdate handles the POST of the form to update a project
func HandleUpdate(context router.Context) error {
	//Find the project
	p, err := projects.Find(context.ParamInt("id"))
	if err != nil {
		return router.NotFoundError(err)
	}

	//Authorise update project
	err = authorise.Resource(context, p)
	if err != nil {
		return router.NotAuthorizedError(err)
	}

	//Update the project from params
	params, err := context.Params()
	if err != nil {
		return router.InternalError(err)
	}
	err = p.Update(params.Map())
	if err != nil {
		return router.InternalError(err)
	}

	//Redirect to project
	return router.Redirect(context, "/projects/dashboard")
}
