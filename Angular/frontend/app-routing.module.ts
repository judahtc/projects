import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { SignupComponent } from './signup/signup.component';
import { ViewComponent } from './view/view.component';
import { UsersComponent } from './users/users.component';
import { UpdateComponent } from './update/update.component';
import { SignupAlternateComponent } from './signup-alternate/signup-alternate.component';
import { HomepageComponent } from './homepage/homepage.component';
import { DeleteComponent } from './delete/delete.component';
import { PortalComponent } from './portal/portal.component'
const routes: Routes = [
  { path:"", component:HomepageComponent},
  { path:"view", component:ViewComponent},
  { path:"login", component:LoginComponent},
  { path:"signup", component:SignupComponent},
  { path:"users", component:UsersComponent},
  { path:"update/:id", component:UpdateComponent},
  { path:"signup1", component:SignupAlternateComponent},
  { path:"signup1", component:SignupAlternateComponent},
  { path:"delete/:id", component:DeleteComponent },
  { path:"portal", component:PortalComponent},
  
];




@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

export const routeComponents=[
  HomepageComponent,ViewComponent,LoginComponent,SignupComponent,UsersComponent,SignupAlternateComponent,UpdateComponent,PortalComponent
]

