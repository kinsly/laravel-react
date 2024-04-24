import { Cart } from "@/types"
import { Link } from "@inertiajs/react"

export default function OwlCard(
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
  }: {
    id:number,
    className?:string,
    src:string,
    tag?:string,
    title:string,
    description:string,
    price:number,
    cart:Cart[]|null,
    handleAddtoCart: (id:number) => void
  }
)
{
  return (
    <div className="border border-primary rounded position-relative vesitable-item">
      <div className="vesitable-img">
          <img
            src={src}
            className={`img-fluid w-100 rounded-top ${className}`}
            alt=""
          />
      </div>
      <div
          className="text-white bg-primary px-3 py-1 rounded position-absolute"
          style={{ top: 10, right: 10 }}
      >
          {tag}
      </div>
      <div className="p-4 rounded-bottom">
          <h4>{title}</h4>
          <p>
          {description}
          </p>
          <div className="d-flex justify-content-between flex-lg-wrap">
          <p className="text-dark fs-5 fw-bold mb-0">${price} / kg</p>
          {
                  cart?.length == 0?
          
                  <button onClick={() => handleAddtoCart(id)}
                          className="btn border border-secondary rounded-pill px-3 text-primary">
                    <i className="fa fa-shopping-bag me-2 text-primary" /> Add to cart
                  </button>
                  :
                  <Link href={route('cart.index')}
                    className="btn border border-secondary rounded-pill px-3 text-primary">
                    <i className="fa fa-shopping-bag me-2 text-primary" /> View Cart
                  </Link>
            }
          </div>
      </div>
    </div>
  )
}