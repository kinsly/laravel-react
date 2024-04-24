import { Config } from 'ziggy-js';

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;

}

export interface Category{
    id:number,
    name:string,
    slug:string
}

export interface SingleItemModel{
    id:string,
    title:string,
    card_tag?:string,
    card_info:string, 
    unit_price:number,
    ratings:number,
    summary:string
    description:string,
    isAvailable:number,
    fd_category_id:number,
    image:{
        id:string,
        url:string,
        alt:string,
        thumnail_url:string,
    },
    carts: Cart[]
}

export interface ItemsModel{
    data:SingleItemModel[],
    links?:Pagination[],

}

interface Pagination
{
    url:string;
    active:boolean;
    label:string;
}

export interface Cart
{
    id:string,
    quantity:number,
    status:'incomplete' | 'complete',
    items:CartItem[]
}

export interface CartItem{
    id:string,
    quantity:number,
    item:SingleItemModel
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    price?:number,
    ziggy: Config & { location: string },
    cart_item_quantity:number

};
