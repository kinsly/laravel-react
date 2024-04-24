export default function FactCard(
  {
    title,
    value
  }:{
    title:string,
    value:string
  }
)
{
  return(
    <div className="col-md-6 col-lg-6 col-xl-3">
        <div className="counter bg-white rounded p-5">
        <i className="fa fa-users text-secondary" />
        <h4>{title}</h4>
        <h1>{value}</h1>
        </div>
    </div>
  )
}