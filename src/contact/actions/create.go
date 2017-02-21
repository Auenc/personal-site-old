package contactactions

import (
	"github.com/auenc/personal-site/src/contact"
	"github.com/fragmenta/router"
)

//POST contact/create
func HandleCreate(context router.Context) error {
	//Setup context
	params, err := context.Params()
	if err != nil {
		return router.InternalError(err)
	}

	id, err := contact.Create(params.Map())
	if err != nil {
		context.Logf("#info Failed to create contact %v", params)
		return router.InternalError(err)
	}
	//Log creation
	context.Logf("#info Created new contact id: %d", id)

	return router.Redirect(context, "/")
}
