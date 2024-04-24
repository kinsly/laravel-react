import TestimonialCard from "@/Components/Partials/TestimonialCard";
import SinglePageHeader from "@/Components/SinglePageHeader";
import Testimonial from "@/Components/Testimonial";
import GuestLayout from "@/Layouts/GuestLayout";
import { PageProps } from "@/types";
import { Head } from "@inertiajs/react";
export default function TestimonialPage({auth, cart_item_quantity}: PageProps)
{
  return(
    <GuestLayout  user={auth?.user} cart_item_quantity={cart_item_quantity}>
      <Head title="Testimonial"/>
      <SinglePageHeader title="Testimonial"/>
      <Testimonial/>
    </GuestLayout>
  )
}