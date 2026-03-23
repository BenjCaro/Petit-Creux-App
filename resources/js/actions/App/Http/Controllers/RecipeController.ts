import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\RecipeController::show
 * @see app/Http/Controllers/RecipeController.php:11
 * @route '/recettes/{recipe}'
 */
export const show = (args: { recipe: string | { slug: string } } | [recipe: string | { slug: string } ] | string | { slug: string }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/recettes/{recipe}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\RecipeController::show
 * @see app/Http/Controllers/RecipeController.php:11
 * @route '/recettes/{recipe}'
 */
show.url = (args: { recipe: string | { slug: string } } | [recipe: string | { slug: string } ] | string | { slug: string }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { recipe: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'slug' in args) {
            args = { recipe: args.slug }
        }
    
    if (Array.isArray(args)) {
        args = {
                    recipe: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        recipe: typeof args.recipe === 'object'
                ? args.recipe.slug
                : args.recipe,
                }

    return show.definition.url
            .replace('{recipe}', parsedArgs.recipe.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\RecipeController::show
 * @see app/Http/Controllers/RecipeController.php:11
 * @route '/recettes/{recipe}'
 */
show.get = (args: { recipe: string | { slug: string } } | [recipe: string | { slug: string } ] | string | { slug: string }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\RecipeController::show
 * @see app/Http/Controllers/RecipeController.php:11
 * @route '/recettes/{recipe}'
 */
show.head = (args: { recipe: string | { slug: string } } | [recipe: string | { slug: string } ] | string | { slug: string }, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\RecipeController::show
 * @see app/Http/Controllers/RecipeController.php:11
 * @route '/recettes/{recipe}'
 */
    const showForm = (args: { recipe: string | { slug: string } } | [recipe: string | { slug: string } ] | string | { slug: string }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: show.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\RecipeController::show
 * @see app/Http/Controllers/RecipeController.php:11
 * @route '/recettes/{recipe}'
 */
        showForm.get = (args: { recipe: string | { slug: string } } | [recipe: string | { slug: string } ] | string | { slug: string }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\RecipeController::show
 * @see app/Http/Controllers/RecipeController.php:11
 * @route '/recettes/{recipe}'
 */
        showForm.head = (args: { recipe: string | { slug: string } } | [recipe: string | { slug: string } ] | string | { slug: string }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    show.form = showForm
const RecipeController = { show }

export default RecipeController