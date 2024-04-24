import { Cart } from "@/types";
import { Link, router } from "@inertiajs/react";
import { useState } from "react";

export default function FruitCard(
  {
    id,
    className, 
    src, 
    tag, 
    title, 
    description,
    price,
    cart=null,
    handleAddtoCart
    }: {id:string,className:string, src:string, tag:string, title:string, 
      description:string, price:number, cart:Cart[]|null,
      handleAddtoCart: (id:string) => void
    })
{
  return (
    <div className={className}>
      <div className="rounded position-relative fruite-item">
        <div className="fruite-img">
          <Link preserveScroll href={route('singleItem',[id,title])}>
            <img
            src={src}
            className="img-fluid w-100 rounded-top"
            alt=""
            />
            </Link>
        </div>
        <div
            className="text-white bg-secondary px-3 py-1 rounded position-absolute"
            style={{ top: 10, left: 10 }}
        >
            {tag}
        </div>
        <div className="p-4 border border-secondary border-top-0 rounded-bottom">
            <Link preserveScroll href={route('singleItem',[id,title])}><h4>{title}</h4></Link>
            <p>
            {description}
            </p>
            <div className="d-flex justify-content-between flex-lg-wrap">
            <p className="text-dark fs-5 fw-bold mb-0" style={{width: '100%'}}>
                ${price} / kg
            </p>
            <br/>
                <i className="fa fa-shopping-bag me-2 text-primary" />{" "}
                {
                  cart?.length == 0?
                  <button onClick={() => handleAddtoCart(id)}
                
                  className="btn border border-secondary rounded-pill px-3 text-primary">
                      Add to Cart
                  </button>
                  : 
                  <Link href={route('cart.index')} className="btn border border-secondary rounded-pill px-3 text-primary">
                      View Cart
                  </Link>
                }
                
            
            </div>
        </div>
      </div>
  </div>

  )
}