import SinglePageHeader from "@/Components/SinglePageHeader";
import Guest from "@/Layouts/GuestLayout";
import GuestLayout from "@/Layouts/GuestLayout";
import { PageProps } from "@/types";
import { Head, Link } from "@inertiajs/react";

export default function NotFoundPage({auth, cart_item_quantity}: PageProps)
{
  return (
    <GuestLayout  user={auth?.user} cart_item_quantity={cart_item_quantity}>
      <Head title="Page not found"/>
      <SinglePageHeader title="404"/>
      <div className="container-fluid py-5">
        <div className="container py-5 text-center">
          <div className="row justify-content-center">
            <div className="col-lg-6">
              <i className="bi bi-exclamation-triangle display-1 text-secondary" />
              <h1 className="display-1">404</h1>
              <h1 className="mb-4">Page Not Found</h1>
              <p className="mb-4">
                We’re sorry, the page you have looked for does not exist in our
                website! Maybe go to our home page or try to use a search?
              </p>
              <Link
                className="btn border-secondary rounded-pill py-3 px-5"
                href={route('home')}
              >
                Go Back To Home
              </Link>
            </div>
          </div>
        </div>
      </div>

    </GuestLayout>
  )
}