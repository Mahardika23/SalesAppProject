import React from 'react';
import { Col, Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import "./Daftar2.css";
import {Link} from 'react-router-dom'
import logo from '../../../src/logo.svg'


const Daftar2 = (props) => {
  return (
    <div className='halaman'>
      <div style={{backgroundColor:'white'}}className="daftar">
          <h1 ><b>SALES APP</b></h1>
          <img src={logo} alt="Logo" width="300px"></img>
          <h2>Daftar</h2>
      <Form className="container">  
        <FormGroup row>
          <Label for="exampleEmail" sm={3}>Nama Toko</Label>
          <Col sm={9}>
            <Input type="text" name="Namatoko" id="exampleEmail" />
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="examplePassword" sm={3}>Alamat</Label>
          <Col sm={9}>
            <Input type="text" name="Alamat" id="examplePassword"  />
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="exampleSelect" sm={3}>Nama Pemilik</Label>
          <Col sm={9}>
            <Input type="text" name="Pemilik" id="exampleSelect" />
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="exampleSelectMulti" sm={3}>Email</Label>
          <Col sm={9}>
            <Input type="email" name="Email" id="exampleSelectMulti"  />
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="examplePassword" sm={3}>No Telp</Label>
          <Col sm={9}>
            <Input type="text" name="NoTelp" id="examplePassword"  />
          </Col>
        </FormGroup>
        <Link to='./login'><Button variant ="purple"  type="submit">
            Daftar
          </Button></Link>
      </Form>
      </div>
    </div>
  );
}

export default Daftar2;