import HomeController from './HomeController'
import RecipeController from './RecipeController'
import CategoryController from './CategoryController'
import Settings from './Settings'
const Controllers = {
    HomeController: Object.assign(HomeController, HomeController),
RecipeController: Object.assign(RecipeController, RecipeController),
CategoryController: Object.assign(CategoryController, CategoryController),
Settings: Object.assign(Settings, Settings),
}

export default Controllers