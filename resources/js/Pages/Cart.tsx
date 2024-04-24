import CartTable from "@/Components/CartTable";
import CartTotal from "@/Components/CartTotal";
import SinglePageHeader from "@/Components/SinglePageHeader";
import GuestLayout from "@/Layouts/GuestLayout";
import { Cart, PageProps } from "@/types";
import { Head, router } from "@inertiajs/react";

export default function CartPage({cart, auth, cart_item_quantity}:PageProps<{cart:Cart}>)
{

  const handleChangeQuantity = (order:string, product_id:number) => {
    var url = route('cart.quantity');
    router.visit(url, {
      method:'post',
      data: {id: product_id, order: order},
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


  const handleRemoveCartItem = (product_id:number) => {
    var url = route('cart.removeItem',[product_id]);
    
    router.visit(url, {
      method:'delete',
      data: {id: product_id},
      preserveState: true,
      replace: false,
      preserveScroll: true,
      onStart: visit => {console.log(visit)},
      onProgress: progress => {console.log(progress)}
    })
  }

  return(
    <GuestLayout user={auth?.user} cart_item_quantity={cart_item_quantity}>
      <Head title="Cart"/>
      <SinglePageHeader title="Cart"/>
      <div className="container-fluid py-5">
        <div className="container py-5">
          <div className="table-responsive">

            <CartTable 
              cartItems={cart?.items}
              changeQuantity={(order, product_id) => handleChangeQuantity(order, product_id)}
              removeCartItem={(product_id) => handleRemoveCartItem(product_id)}
            />

          </div>
          <div className="mt-5">

            <input
              type="text"
              className="border-0 border-bottom rounded me-5 py-3 mb-4"
              placeholder="Coupon Code"
            />
            <button
              className="btn border-secondary rounded-pill px-4 py-3 text-primary"
              type="button"
            >
              Apply Coupon
            </button>

          </div>
          <div className="row g-4 justify-content-end">
            <div className="col-8" />
            <div className="col-sm-8 col-md-7 col-lg-6 col-xl-4">

              <CartTotal cartItems={cart?.items}/>

            </div>
          </div>
        </div>
      </div>

    </GuestLayout>
  )
}