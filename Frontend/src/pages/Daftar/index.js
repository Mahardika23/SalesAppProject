import React from 'react';
import { Col, Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import "./Daftar.css";
import {Link} from 'react-router-dom'
import logo from '../../../src/logo.svg'
import axios from 'axios';
class Daftar extends React.Component{

handleChange = event => {
    this.setState({ 
      Username: event.target.value,
      });
  }
handleChangeEmail = event => {
    this.setState({ 
      email: event.target.value,
      });
  }
  handleChangePass = event => {
    this.setState({ 
      Password: event.target.value,
    });
  }
    handleChangePassConfirm = event => {
    this.setState({ 
      Password: event.target.value,
      Konfirmasi: event.target.value,
    });
  }
handleSubmit = async () => {
    // event.preventDefault();

    const user = {
      email:this.state.email,
      name: this.state.Username,
      password: this.state.Password,
      password_confirmation: this.state.Konfirmasi
    };


      let res = await axios.post('http://127.0.0.1:8000/api/register',  user );
      // let {data} = res.data;
      // this.setState({user:data})
      // .then(res => {
      //   // console.log(res);
          console.log(user);
        
      // })
    
  }

render(){

  return (
    <div className='halaman'>
      <div style={{backgroundColor:'white'}}className="daftar">
          <h1 ><b>SALES APP</b></h1>
          <img src={logo} alt="Logo" width="300px"></img>
          <h2>Daftar</h2>
      <Form className="container" onSubmit={this.handleSubmit}>  
        <FormGroup row>
          <Label for="exampleSelect" sm={3}>Username</Label>
          <Col sm={9}>
            <Input type="text" name="Username" id="exampleSelect" onChange={this.handleChange}/>
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="exampleSelect" sm={3}>Email</Label>
          <Col sm={9}>
            <Input type="email" name="email" id="exampleSelect" onChange={this.handleChangeEmail}/>
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="examplePassword" sm={3}>Password</Label>
          <Col sm={9}>
            <Input type="password" name="Password" id="examplePassword"  onChange={this.handleChangePass}/>
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="exampleSelect" sm={3}>Konfirmasi</Label>
          <Col sm={9}>
            <Input type="password" name="Konfirmasi" id="exampleSelect" onChange={this.handleChangePassConfirm}/>
          </Col>
        </FormGroup>
       <Button variant ="purple"  type="submit">
            Selanjutnya
          </Button>
      </Form>
      </div>
    </div>
  );
}
}
export default Daftar;