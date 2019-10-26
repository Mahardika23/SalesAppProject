import React from 'react';
import { Col, Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import "./Daftar.css";
import {Link} from 'react-router-dom'
import logo from '../../../src/logo.svg'


const Daftar = (props) => {
  return (
    <div className='halaman'>
      <div style={{backgroundColor:'white'}}className="daftar">
          <h1 ><b>SALES APP</b></h1>
          <img src={logo} alt="Logo" width="300px"></img>
          <h2>Daftar</h2>
      <Form className="container">  
        <FormGroup row>
          <Label for="exampleSelect" sm={3}>Username</Label>
          <Col sm={9}>
            <Input type="text" name="Username" id="exampleSelect" />
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="examplePassword" sm={3}>Password</Label>
          <Col sm={9}>
            <Input type="password" name="Password" id="examplePassword"  />
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="exampleSelect" sm={3}>Konfirmasi</Label>
          <Col sm={9}>
            <Input type="password" name="Konfirmasi" id="exampleSelect" />
          </Col>
        </FormGroup>
        <Link to='./daftar2'><Button variant ="purple"  type="submit">
            Selanjutnya
          </Button></Link>
      </Form>
      </div>
    </div>
  );
}

export default Daftar;