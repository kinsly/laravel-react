import { ItemsModel } from "@/types"
import OwlCard from "./Partials/OwlCard"

export default function VegetableShop(
    {
        items,
        handleAddtoCart
    }
    :
    {
        items:ItemsModel,
        handleAddtoCart:(id:number) => void
    })
{
  return (
    <div className="container-fluid vesitable py-5">
            <div className="container py-5">
            <h1 className="mb-0">Fresh Organic Vegetables</h1>
            <div className="owl-carousel vegetable-carousel justify-content-center">

                {
                    items.data.map((item, index) =>
                    {
                        return(
                            <OwlCard
                                key={index}
                                id={parseInt(item.id)}
                                className = ""
                                src={item.image.url}
                                tag={item.card_tag}
                                title={item.title}
                                description={item.description}
                                price={item.unit_price}
                                cart={item.carts}
                                handleAddtoCart={(id)=> handleAddtoCart(id)}
                            />
                        )
                    })
                }
               
            </div>
            </div>
        </div>
  )
}