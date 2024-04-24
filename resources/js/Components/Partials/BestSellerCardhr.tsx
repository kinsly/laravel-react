import { Cart } from "@/types"

export default function BestSellerCardhr(
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
  return(
    <div className="col-lg-6 col-xl-4">
      <div className="p-4 rounded bg-light">
        <div className="row align-items-center">
        <div className="col-6">
            <img
            src={src}
            className="img-fluid rounded-circle w-100"
            alt=""
            />
        </div>
        <div className="col-6">
            <a href="#" className="h5">
            {title}
            </a>
            <div className="d-flex my-3">
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
                  <a  href="#"
                    className="btn border border-secondary rounded-pill px-3 text-primary">
                    <i className="fa fa-shopping-bag me-2 text-primary" /> View Cart
                  </a>
            }
            
        </div>
        </div>
      </div>
    </div>
  )
}