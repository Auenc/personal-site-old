package projectactions

import (
	"web/personal/src/lib/authorise"

	"github.com/auenc/personal-site/src/projects"
	"github.com/fragmenta/router"
	"github.com/fragmenta/view"
)

//GET projects/create
func HandleCreateShow(context router.Context) error {
	//Authorise
	err := authorise.Path(context)
	if err != nil {
		return router.NotAuthorizedError(err)
	}

	//Setup
	view := view.New(context)
	project := projects.New()
	view.AddKey("project", project)

	//Serve
	return view.Render()
}

//POST projects/create
func HandleCreate(context router.Context) error {
	//Authorise
	err := authorise.Path(context)
	if err != nil {
		return router.NotAuthorizedError(err)
	}

	//Setup context
	params, err := context.Params()
	if err != nil {
		return router.InternalError(err)
	}

	id, err := projects.Create(params.Map())
	if err != nil {
		context.Logf("#info Failed to create project %v", params)
		return router.InternalError(err)
	}

	//Log creation
	context.Logf("#info Created project id, %d", id)

	_, err = projects.Find(id)
	if err != nil {
		context.Logf("#Error Error creating project, %s", err)
	}

	return router.Redirect(context, "/projects/dashboard")
}
