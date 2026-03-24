export interface Recipe {
    id: number;
    title: string;
    description?: string;
    slug: string;
    approved: boolean;
    duration: number;
    category_id: number;
    user_id: number;
    category?: Category;
    ingredients?: Ingredient[];
    steps?: Step[];
}

export interface Paginator {
    data: Recipe[]; 
    current_page: number;
    last_page: number;
    links: {
        url: string | null;
        label: string;
        active: boolean;
    }[];
    total: number;
}

export interface Category {
    id: number;
    name: string;
    slug: string;
    recipes: Recipe[];
}

export interface Ingredient {
    id: number;
    name: string;
    type: string;
    pivot: {
        quantity: number;
        unit: string;
    }
}

export interface Step {
    id: number;
    step_number: number;
    content: string;
}