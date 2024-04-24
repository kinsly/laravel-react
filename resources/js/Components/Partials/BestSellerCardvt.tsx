import { Cart } from "@/types"
import { Link } from "@inertiajs/react"

export default function BestSellerCardvt(
  {
    id,
    src,
    title,
    price,
    cart=null,
    handleAddtoCart
  }:{
    id:number,
    src:string,
    title:string,
    price:number,
    cart:Cart[]|null,
    handleAddtoCart: (id:number) => void
  }
)
{
  return (
    <div className="col-md-6 col-lg-6 col-xl-3">
      <div className="text-center">
          <img
          src={src}
          className="img-fluid rounded"
          alt=""
          />
          <div className="py-4">
          <a href="#" className="h5">
              {title}
          </a>
          <div className="d-flex my-3 justify-content-center">
              <i className="fas fa-star text-primary" />
              <i className="fas fa-star text-primary" />
              <i className="fas fa-star text-primary" />
              <i className="fas fa-star text-primary" />
              <i className="fas fa-star" />
          </div>
          <h4 className="mb-3">${price}</h4>
          {
                  cart?.length == 0?
                    <button 
                        onClick={() => handleAddtoCart(id)}
                        className="btn border border-secondary rounded-pill px-3 text-primary">
                      <i className="fa fa-shopping-bag me-2 text-primary" /> Add to
                      cart
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