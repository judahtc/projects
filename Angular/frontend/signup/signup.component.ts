import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { HttpClient } from '@angular/common/http'
import {  DataService } from '../data.service'
import { User } from '../userss'
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { FormBuilder, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
 export class SignupComponent implements OnInit {
 form:FormGroup;

  constructor(
              private dataService:DataService,
              private router:Router,
              private fb:FormBuilder) { }

  ngOnInit(): void {
    this.form=this.fb.group({
        name: [''],
        email: [''],
        password: ['']
  
      })
  }
      onSubmit(){
        this.dataService.upload(this.form.value).
        subscribe((result)=>{
        console.log(this.form.value)
        this.router.navigate(['/login'])
        
  }
  
  )

}

}
