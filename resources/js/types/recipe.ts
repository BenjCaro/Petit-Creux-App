export interface Recipe {
    id: number;
    title: string;
    description?: string;
    difficulty: number;
    difficulty_label?: string;
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
    prev_page_url: string | null;
    next_page_url: string | null;
}

export interface Category {
    id: number;
    name: string;
    slug: string;
    approved_recipes?: Recipe[];
    approved_recipes_count?: number;
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

export interface DifficultyLevel {
  value: number;
  label: string;
}

export interface Duration {
    value: number;
    label: string;
}