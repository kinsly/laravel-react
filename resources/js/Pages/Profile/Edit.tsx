import SinglePageHeader from "@/Components/SinglePageHeader";
import GuestLayout from "@/Layouts/GuestLayout";
import { PageProps } from "@/types";
import { Head, useForm } from "@inertiajs/react";
import { FormEventHandler, useEffect } from "react";
import UpdateProfileInformation from "./Partials/UpdateProfileInformation";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm";
import DeleteUserForm from "./Partials/DeleteUserForm";


export default function EditUser({ auth, mustVerifyEmail, status }: PageProps<{ mustVerifyEmail: boolean, status?: string }>){
  

  return(
    <GuestLayout user={auth.user}>
      <Head title="Edit profile information" />
      <SinglePageHeader title="Edit profile"/>
      <div className="container-fluid py-5">
        <div className="container col-md-6">
         <div className="justify-content-center">
          <div className="card">
            <div className="card-body">
            
            <UpdateProfileInformation             
              mustVerifyEmail={mustVerifyEmail}
              status={status}/>

              <hr/>
              <UpdatePasswordForm/>

              <hr/>
              <DeleteUserForm/>

            </div>
          </div>
        </div> 

         
         
        </div>
      </div>
    </GuestLayout>
  )
}