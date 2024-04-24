
import ItemCategories from "@/Components/ItemCategories"
import Keywords from "@/Components/Partials/Keywords"
import OwlCard from "@/Components/Partials/OwlCard"
import SidebarBanner from "@/Components/Partials/SidebarBanner"
import SidebarFeaturedItems from "@/Components/Partials/SidebarFeatuedItems"
import SingleItemDetails from "@/Components/SingleItemDetails"
import SinglePageHeader from "@/Components/SinglePageHeader"
import GuestLayout from "@/Layouts/GuestLayout"
import { Category, PageProps, SingleItemModel } from "@/types"
import { Head } from "@inertiajs/react"

export default function SingleItem(
    {
      auth, item, categories, cart_item_quantity, relatedItems, featuredItems}:
    PageProps<
    {
      item:SingleItemModel, 
      categories:Category[], 
      relatedItems:SingleItemModel[],
      featuredItems:SingleItemModel[],
    }>){


 const handleAddtoCart = (id:number) => {

 }
 
  return(
    <GuestLayout cart_item_quantity={cart_item_quantity} user={auth.user}>
      <Head title={item.title}/>
     <SinglePageHeader title={item.title}/>
     <div className="container-fluid py-5 mt-5">
        <div className="container py-5">
          <div className="row g-4 mb-5">
            <div className="col-lg-8 col-xl-9">

              <SingleItemDetails item={item}/>

            </div>
            <div className="col-lg-4 col-xl-3">
              <div className="row g-4 fruite">
                <div className="col-lg-12">
                  {/* <Keywords className="input-group w-100 mx-auto d-flex mb-4"/> */}
                  

                  {/* Categories */}
                  <ItemCategories
                    className="mb-4"
                    categories={categories}
                  />        
                </div>
                <div className="col-lg-12">
                  <h4 className="mb-4">Featured products</h4>

                  {
                      featuredItems.map((item, index) => {
                        return(
                        <SidebarFeaturedItems
                            key={index}
                            src={item.image.url}
                            title={item.title}
                            prePrice={item.unit_price-2}
                            newPrice={item.unit_price}/>
                        )
                      })
                    }

                </div>
                <div className="col-lg-12">
                  <SidebarBanner/>
                </div>
              </div>
            </div>
          </div>
          <h1 className="fw-bold mb-0">Related products</h1>
          <div className="vesitable">
            <div className="owl-carousel vegetable-carousel justify-content-center">
            {
              relatedItems.map((item, index) =>
              {
                  return(
                      <OwlCard
                          id={ parseInt(item.id)}
                          key={index}
                          className = ""
                          src={item.image.url}
                          tag={item.card_tag}
                          title={item.title}
                          description={item.description}
                          price={item.unit_price}
                          cart={item.carts}
                          handleAddtoCart={(id) => handleAddtoCart(id)}
                      />
                  )
              })
          }   

            </div>
          </div>
        </div>
      </div>
 
    </GuestLayout>
  )
}