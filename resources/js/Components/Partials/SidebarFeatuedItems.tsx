export default function SidebarFeaturedItems(
  {
    src,
    title,
    prePrice,
    newPrice,
  }:
  {
    src:string,
    title:string,
    prePrice:number,
    newPrice:number
  }
)
{
  return(
    <div className="d-flex align-items-center justify-content-start">
      <div
        className="rounded me-4"
        style={{ width: 100, height: 100 }}
      >
        <img
          src={src}
          className="img-fluid rounded"
          alt=""
        />
      </div>
      <div>
        <h6 className="mb-2">{title}</h6>
        <div className="d-flex mb-2">
          <i className="fa fa-star text-secondary" />
          <i className="fa fa-star text-secondary" />
          <i className="fa fa-star text-secondary" />
          <i className="fa fa-star text-secondary" />
          <i className="fa fa-star" />
        </div>
        <div className="d-flex mb-2">
          <h5 className="fw-bold me-2">${newPrice}</h5>
          <h5 className="text-danger text-decoration-line-through">
            ${prePrice}
          </h5>
        </div>
      </div>
    </div>
  )
}