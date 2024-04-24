import FactCard from "./Partials/FactCard"

export default function Fact()
{
    const items = [
        {
            title:"satisfied customers",
            value:"1963"
        },
        {
            title:"quality of service",
            value:"99%"
        },
        {
            title:"quality certificates",
            value:"33"
        },
        {
            title:"Available Products",
            value:"789"
        }
    ]
  return (
    <div className="container-fluid py-5">
    <div className="container">
    <div className="bg-light p-5 rounded">
        <div className="row g-4 justify-content-center">

        {
            items.map((item, index) =>{
                return (
                    <FactCard
                        key={index}
                        title={item.title}
                        value={item.value}/>
                )
            })
        }   

     

        </div>
    </div>
    </div>
</div>
  )
}