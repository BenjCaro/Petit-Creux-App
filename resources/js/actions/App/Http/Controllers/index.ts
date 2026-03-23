import HomeController from './HomeController'
import RecipeController from './RecipeController'
import Settings from './Settings'
const Controllers = {
    HomeController: Object.assign(HomeController, HomeController),
RecipeController: Object.assign(RecipeController, RecipeController),
Settings: Object.assign(Settings, Settings),
}

export default Controllers