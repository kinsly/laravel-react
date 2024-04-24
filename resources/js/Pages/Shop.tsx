import ItemCategories from "@/Components/ItemCategories"
import FruitCard from "@/Components/Partials/FruitCard"
import Keywords from "@/Components/Partials/Keywords"
import SidebarBanner from "@/Components/Partials/SidebarBanner"
import SidebarFeaturedItems from "@/Components/Partials/SidebarFeatuedItems"
import PriceSlider from "@/Components/PriceSlider"
import SinglePageHeader from "@/Components/SinglePageHeader"
import GuestLayout from "@/Layouts/GuestLayout"
import {Category, ItemsModel, PageProps,  } from "@/types"
import { Head, Link, router } from "@inertiajs/react"
import { useState } from "react"

export default function Shop({auth, items, categories, cart_item_quantity}:PageProps<{items:ItemsModel, categories:Category[]}>)
{
  const [defaultPrice, setDefaultPrice] = useState(0);
  const [defaultKeyword, setDefaultKeyword] = useState('');

  const onPriceChange = (price:number) => {
    setDefaultPrice(price);
    setDefaultKeyword(' ');

    if(price == 0){
      var url = route('shop')
    }else{
      var url = route('shop.price',price)
    }

    router.visit(url, {
      method: 'get',
      data: {},
      preserveState: true,
      replace: false,
      preserveScroll: true,
      onStart: visit => {console.log(visit)},
      onProgress: progress => {console.log(progress)},
      onSuccess: (page)=> {},
      onError: errors => {},
      onFinish: visit => {},
    })
  } 

  const handleSearch = (keyword:string) =>{
    keyword = keyword.trim();
    setDefaultPrice(0);
    setDefaultKeyword(keyword);
    if(keyword == ''){
      var url = route('shop');
    }else{
      var url = route('shop.search',keyword);
    }

    router.visit(url, {
      method:'get',
      data: {},
      preserveState: true,
      replace: false,
      preserveScroll: true,
      onStart: visit => {console.log(visit)},
      onProgress: progress => {console.log(progress)},
      onSuccess: (page)=> {},
      onError: errors => {},
      onFinish: visit => {},
    })
  }

  const featuredProducts = [
    {
      src:"/theme/img/featur-1.jpg",
      title:"Big Banana",
      prePrice:4.11,
      newPrice:2.99
    },
    {
      src:"/theme/img/featur-3.jpg",
      title:"Big Banana",
      prePrice:4.11,
      newPrice:2.99
    },
    {
      src:"/theme/img/featur-2.jpg",
      title:"Big Banana",
      prePrice:4.11,
      newPrice:2.99
    }
  ]

  const handleAddtoCart = (id:number) =>
  {
    var url = route('cart.store');
    router.visit(url, {
      method:'post',
      data: {id, 'quantity':1},
      preserveState: true,
      replace: false,
      preserveScroll: true,
      onStart: visit => {console.log(visit)},
      onProgress: progress => {console.log(progress)},
      onSuccess: (page)=> {},
      onError: errors => {},
      onFinish: visit => {},
    })

  }
  return (
    <GuestLayout user={auth.user && auth.user} cart_item_quantity={cart_item_quantity}>
      <Head>
        <title>Your page title</title>
        <meta name="description" content="Your page description" />
      </Head>
      <SinglePageHeader title="Shop"/>
        <div className="container-fluid fruite py-5">
          <div className="container py-5">
            <h1 className="mb-4">Fresh fruits shop</h1>
            <div className="row g-4">
              <div className="col-lg-12">
                <div className="row g-4">
                  <div className="col-xl-3">

                   <Keywords className="input-group w-100 mx-auto d-flex" 
                      onChange={(keyword) =>handleSearch(keyword)}
                      defaultValue={defaultKeyword}/>

                  </div>
                  
                  <div className="col-6" />
                    <div className="col-xl-3">
                      {/* <div className="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4"> */}
                        {/* <label htmlFor="fruits">Default Sorting:</label> */}
                        {/* <select
                          id="fruits"
                          name="fruitlist"
                          className="border-0 form-select-sm bg-light me-3"
                          form="fruitform"
                        >
                          <option value="volvo">Nothing</option>
                          <option value="saab">Popularity</option>
                          <option value="opel">Organic</option>
                          <option value="audi">Fantastic</option>
                        </select> */}
                      {/* </div> */}
                    </div>
                  </div>

                <div className="row g-4">

                  <div className="col-lg-3">
                    <div className="row g-4">
                      <div className="col-lg-12">
                      {/* Categories */}
                        <ItemCategories
                          className="mb-3"
                          categories={categories}
                        />
                      </div>
                      <div className="col-lg-12">

                        <PriceSlider onPriceChange={(price)=>onPriceChange(price)} defaultPrice={defaultPrice}/>

                      </div>
                      {/* <div className="col-lg-12">

                        <div className="mb-3">
                          <h4>Additional</h4>
                          <div className="mb-2">
                            <input
                              type="radio"
                              className="me-2"
                              id="Categories-1"
                              name="Categories-1"
                              defaultValue="Beverages"
                            />
                            <label htmlFor="Categories-1"> Organic</label>
                          </div>
                          <div className="mb-2">
                            <input
                              type="radio"
                              className="me-2"
                              id="Categories-2"
                              name="Categories-1"
                              defaultValue="Beverages"
                            />
                            <label htmlFor="Categories-2"> Fresh</label>
                          </div>
                          <div className="mb-2">
                            <input
                              type="radio"
                              className="me-2"
                              id="Categories-3"
                              name="Categories-1"
                              defaultValue="Beverages"
                            />
                            <label htmlFor="Categories-3"> Sales</label>
                          </div>
                          <div className="mb-2">
                            <input
                              type="radio"
                              className="me-2"
                              id="Categories-4"
                              name="Categories-1"
                              defaultValue="Beverages"
                            />
                            <label htmlFor="Categories-4"> Discount</label>
                          </div>
                          <div className="mb-2">
                            <input
                              type="radio"
                              className="me-2"
                              id="Categories-5"
                              name="Categories-1"
                              defaultValue="Beverages"
                            />
                            <label htmlFor="Categories-5"> Expired</label>
                          </div>
                        </div>

                      </div> */}
                      <div className="col-lg-12">
                        <h4 className="mb-3">Featured products</h4>

                        {
                          featuredProducts.map((item, index) => {
                           return(
                            <SidebarFeaturedItems
                                key={index}
                                src={item.src}
                                title={item.title}
                                prePrice={item.prePrice}
                                newPrice={item.newPrice}/>
                           )
                          })
                        }

                        <div className="d-flex justify-content-center my-4">
                          <a
                            href="#"
                            className="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100"
                          >
                            Vew More
                          </a>
                        </div>

                      </div>
                      <div className="col-lg-12">

                        <SidebarBanner/>

                      </div>
                    </div>
                  </div>

                  <div className="col-lg-9">
                    <div className="row g-4 justify-content-center">

                    {
                        items.data.map((item, index) => 
                        {
                            return(
                                <FruitCard
                                    key={index}
                                    id={item.id}
                                    className='col-md-6 col-lg-6 col-xl-4' 
                                    src={item.image?.url} 
                                    tag= "Fruits" 
                                    title={item.title}
                                    description={item.card_info}
                                    price={item.unit_price}
                                    cart={item.carts}
                                    handleAddtoCart = {(id) => handleAddtoCart(parseInt(id))}
                                />
                            )
                        })
                    }
                      


                      <div className="col-12">
                          <div className="pagination d-flex justify-content-center mt-5">
                            {
                              items.links?.map((link,index) => { 
                                return (
                                  <span key={index}>
                                  
                                    {
                                      (link.active || link.url == null) ?
                                      <a href="#" className="active rounded"> <span dangerouslySetInnerHTML={{ __html: link.label }} /> </a>
                                      :
                                      <Link href={link.url} className="rounded"> <span dangerouslySetInnerHTML={{ __html: link.label }} /> </Link>
                                      
                                    }
                                  </span>
                                )
                              })
                            }
                          </div>
                        {/* <div className="pagination d-flex justify-content-center mt-5">
                          <a href="#" className="rounded">
                            «
                          </a>
                          <a href="#" className="active rounded">
                            1
                          </a>
                          <a href="#" className="rounded">
                            2
                          </a>
                          <a href="#" className="rounded">
                            3
                          </a>
                          <a href="#" className="rounded">
                            4
                          </a>
                          <a href="#" className="rounded">
                            5
                          </a>
                          <a href="#" className="rounded">
                            6
                          </a>
                          <a href="#" className="rounded">
                            »
                          </a>
                        </div> */}

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </GuestLayout>
  )
}