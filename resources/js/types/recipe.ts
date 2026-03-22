export interface Recipe {
    id: number;
    title: string;
    slug: string;
    approved: boolean;
    duration: number;
    category_id: number;
    user_id: number;
    category?: Category;
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