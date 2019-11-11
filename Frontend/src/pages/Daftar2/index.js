import React from 'react';
import { Col, Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import "./Daftar2.css";
import {Link} from 'react-router-dom'
import logo from '../../../src/logo.svg'


class Register2 extends React.Component {
  constructor () {
    super ();
    this.state = {
      fields: {},
      errors: {}
    }
    this.handleChange = this.handleChange.bind(this);
    this.submitRegis2 = this.submitRegis2.bind(this);
  };
  
  handleChange (e) {
    let fields = this.state.fields;
    fields[e.target.name] = e.target.value;
    this.setState ({
      fields
    });
  }

  submitRegis2 (e) {
    e.preventDefault ();
    if (this.validateForm()) {
      let fields = {};
      fields["Namatoko"] = "";
      fields["Alamat"] = "";
      fields["Pemilik"] = "";
      fields["Email"] = "";
      fields["NoTelp"] = "";
      this.setState ({fields:fields});
      alert ("Data berhasil dikirim");
    }
  }

  validateForm () {
    let fields = this.state.fields;
    let errors = {};
    let formIsvalid = true;

    //Nama Toko
    if (!fields["Namatoko"]) {
      formIsvalid = false;
      errors["Namatoko"] = "*nama toko harus diisi";
    }

    if (typeof fields["Namatoko"] !== "undefined") {
      if (!fields["Namatoko"].match(/^[a-zA-Z]*$/ || /^[0-1]/)) {
        formIsvalid = false;
        errors["Namatoko"] = "*tidak dapat menggunakan karakter khusus"
      }
    }

    //Alamat
    if (!fields["Alamat"]) {
      formIsvalid = false;
      errors["Alamat"] = "*alamat harus diisi";
    }

    if (typeof fields["Alamat"] !== "undefined") {
      if (!fields["Alamat"].match(/^[a-zA-Z]*$/)) {
        formIsvalid = false;
        errors["Alamat"] = "*tidak dapat menggunakan karakter khusus"
      }
    }

    //Nama Pemilik
    if (!fields["Pemilik"]) {
      formIsvalid = false;
      errors["Pemilik"] = "*nama pemilik harus diisi";
    }

    if (typeof fields["Pemilik"] !== "undefined") {
      if (!fields["Pemilik"].match(/^[a-zA-Z]*$/)) {
        formIsvalid = false;
        errors["Pemilik"] = "*tidak dapat menggunakan karakter khusus";
      }
    }

    //E - mail
    if (!fields["Email"]) {
      formIsvalid = false;
      errors["Email"] = "*e-mail harus diisi";
    }

    if (typeof fields["Email"] !== "undefined") {
      var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
      if (!pattern.test(fields["Email"])) {
        formIsvalid = false;
        errors["Email"] = "*e-mail tidak valid";
      }
    }

    //No. Telepon 
    if (!fields["NoTelp"]) {
      formIsvalid = false;
      errors["NoTelp"] = "*no. telepon harap diisi";
    }

    if (typeof fields["NoTelp"] !== "undefined") {
      if (!fields["NoTelp"].match(/^[0-9]{12}$/)) {
        formIsvalid = false;
        errors["NoTelp"] = "no. telepon tidak valid"
      }
    }

    this.setState ({
      errors:errors
    });
    return formIsvalid;
  }


  render () {
    return (
      <div className='halaman'>
        <div style={{backgroundColor:'white'}}className="daftar">
            <h1 ><b>SALES APP</b></h1>
            <img src={logo} alt="Logo" width="300px"></img>
            <h2>Daftar</h2>
        <Form method="post" className="container" onSubmit={this.submitRegis2}>  
          <FormGroup row>
            <Label for="exampleEmail" sm={3}>Nama Toko</Label>
            <Col sm={9}>
              <Input type="text" name="Namatoko" id="exampleEmail" value={this.state.fields.Namatoko} onChange={this.handleChange} />
              <div style={{fontSize: 12, color: "red"}}>
                {this.state.errors.Namatoko}
              </div>
            </Col>
          </FormGroup>
          <FormGroup row>
            <Label for="examplePassword" sm={3}>Alamat</Label>
            <Col sm={9}>
              <Input type="text" name="Alamat" id="examplePassword" value={this.state.fields.Alamat} onChange={this.handleChange} />
              <div style={{fontSize: 12, color: "red"}}>
                {this.state.errors.Alamat}
              </div>
            </Col>
          </FormGroup>
          <FormGroup row>
            <Label for="exampleSelect" sm={3}>Nama Pemilik</Label>
            <Col sm={9}>
              <Input type="text" name="Pemilik" id="exampleSelect" value={this.state.fields.Pemilik} onChange={this.handleChange} />
              <div style={{fontSize: 12, color: "red"}}>
                {this.state.errors.Pemilik}
              </div>
            </Col>
          </FormGroup>
          <FormGroup row>
            <Label for="exampleSelectMulti" sm={3}>Email</Label>
            <Col sm={9}>
              <Input type="email" name="Email" id="exampleSelectMulti" value={this.state.fields.Email} onChange={this.handleChange} />
              <div style={{fontSize: 12, color: "red"}}>
                {this.state.errors.Email}
              </div>
            </Col>
          </FormGroup>
          <FormGroup row>
            <Label for="examplePassword" sm={3}>No Telp</Label>
            <Col sm={9}>
              <Input type="text" name="NoTelp" id="examplePassword" value={this.state.fields.NoTelp} onChange={this.handleChange} />
              <div style={{fontSize: 12, color: "red"}}>
                {this.state.errors.NoTelp}
              </div>
            </Col>
          </FormGroup>
          <Button variant ="purple"  type="submit">
              Daftar
          </Button>
        </Form>
        </div>
      </div>
    );
  }
}

export default Register2;