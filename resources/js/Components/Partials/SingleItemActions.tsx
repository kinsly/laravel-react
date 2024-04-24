import { SingleItemModel } from "@/types";

export default function SingleItemActions({item}:{item:SingleItemModel})
{
  return(
    <>
       <h4 className="fw-bold mb-3">{item.title}</h4>
        <p className="mb-3">Category: Vegetables</p>
        <h5 className="fw-bold mb-3">${item.unit_price}</h5>
        <div className="d-flex mb-4">
          <i className="fa fa-star text-secondary" />
          <i className="fa fa-star text-secondary" />
          <i className="fa fa-star text-secondary" />
          <i className="fa fa-star text-secondary" />
          <i className="fa fa-star" />
        </div>
        <p className="mb-4">
          {item.summary}
        </p>
        
        <div className="input-group quantity mb-5" style={{ width: 100 }}>
          <div className="input-group-btn">
            <button className="btn btn-sm btn-minus rounded-circle bg-light border">
              <i className="fa fa-minus" />
            </button>
          </div>
          <input
            type="text"
            className="form-control form-control-sm text-center border-0"
            defaultValue={1}
          />
          <div className="input-group-btn">
            <button className="btn btn-sm btn-plus rounded-circle bg-light border">
              <i className="fa fa-plus" />
            </button>
          </div>
        </div>
        <a
          href="#"
          className="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"
        >
          <i className="fa fa-shopping-bag me-2 text-primary" /> Add to cart
        </a>
    </>
  )
}