import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { from } from 'rxjs';
import { FormGroup,FormBuilder,ReactiveFormsModule } from '@angular/forms'
import { DataService } from '../data.service'

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
    form:FormGroup;
  constructor(private router:Router,
              private fb:FormBuilder,
              private dataService:DataService
    ) { }

  ngOnInit(): void {
    this.form =this.fb.group(
      {
        name:[''],
        email:[''],
        password:[''],
      }
    );

  

  }

  onSubmit(){
    this.dataService.login(this.form.value).subscribe((res)=>{
      
        console.log(res);
        
        localStorage.setItem("token",res.jwt)
    });
  }

  SignUp(){
    this.router.navigate(['/signup'])

  }

}
