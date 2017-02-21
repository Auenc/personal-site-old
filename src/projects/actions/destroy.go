package projectactions

import (
	"web/personal/src/lib/authorise"

	"github.com/auenc/personal-site/src/projects"
	"github.com/fragmenta/router"
)

//POST /projects/1/destory
func HandleDestroy(context router.Context) error {
	//Set the page on the context for checking
	p, err := projects.Find(context.ParamInt("id"))
	if err != nil {
		return router.NotFoundError(err)
	}

	//Authorise
	err = authorise.Resource(context, p)
	if err != nil {
		return router.NotFoundError(err)
	}

	//Destroy project
	p.Destroy()

	return router.Redirect(context, p.URLIndex())
}
