import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { CommonModule } from '@angular/common';
import { AppRoutingModule, routeComponents} from './app-routing.module';
import { AppComponent } from './app.component';

import { HttpClientModule } from '@angular/common/http';


import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { ModalComponent } from './modal/modal.component';






@NgModule({
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule ,
    NgbModule
    
 
    
  ],

  declarations: [
    AppComponent,
    routeComponents,
    ModalComponent,

   
    
    
  ],


  exports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
   
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
export class SharedModule { } 
