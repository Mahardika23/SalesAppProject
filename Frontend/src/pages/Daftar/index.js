import React from 'react';
import { Col, Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import "./Daftar.css";
import {Link} from 'react-router-dom'
import logo from '../../../src/logo.svg'


class Register extends React.Component {
  constructor () {
    super ();
    this.state = {
      fields: {},
      errors: {}
    }

    this.handleChange = this.handleChange.bind(this);
    this.submitRegis = this.submitRegis.bind(this);
  };

  handleChange (e) {
    let fields = this.state.fields;
    fields[e.target.name] = e.target.value;
    this.setState ({
      fields
    });
  }

  submitRegis (e) {
    e.preventDefault ();
    if (this.validateForm()) {
      let fields = {};
      fields["Username"] = "";
      fields["Password"] = "";
      fields["Konfirmasi"] = "";
      this.setState ({fields:fields});
    }
  }

  validateForm () {
    let fields = this.state.fields;
    let errors = {};
    let formIsValid = true;

    //Username
    if (!fields["Username"]) {
      formIsValid = false;
      errors["Username"] = "*username wajib diisi";
    }

    if (typeof fields["Username"] !== "undefined") {
      if (!fields["Username"].match(/^[a-zA-Z]*$/ || /^[0-9]*$/)) {
        formIsValid = false;
        errors["Username"] = "*tidak dapat menggunakan karakter khusus";
      }
    }

    //Password
    if (!fields["Password"]) {
      formIsValid = false;
      errors["Password"] = "*password wajib diisi";
    }

    if (typeof fields["Password"] !== "undefined") {
      if (!fields["Passowrd"].match(/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/)) {
        formIsValid = false;
        errors["Password"] = "*password kurang aman";
      }
    }

    //Konfirmasi Password
    if (!fields["Konfirmasi"]) {
      formIsValid = false;
      errors["Konfirmasi"] = "*kolom ini wajib diisi";
    }

    if (typeof fields["Konfirmasi"] !== "undefined") {
      if (fields["Konfirmasi"] !== fields["Password"]) {
        formIsValid = false;
        errors["Konfirmasi"] = "*password tidak cocok";
      }
    }

    this.setState ({
      errors:errors
    });
    return formIsValid;
  }


  render () {
    return (
      <div className='halaman'>
        <div style={{backgroundColor:'white'}}className="daftar">
            <h1 ><b>SALES APP</b></h1>
            <img src={logo} alt="Logo" width="300px"></img>
            <h2>Daftar</h2>
        <Form method="post" className="container" onSubmit={this.submitRegis}>  
          <FormGroup row>
            <Label for="exampleSelect" sm={3}>Username</Label>
            <Col sm={9}>
              <Input type="text" name="Username" id="exampleSelect" value={this.state.fields.Username} onChange={this.handleChange} />
              <div style={{fontSize: 12, color: "red"}}>
                {this.state.errors.Username}
              </div>
            </Col>
          </FormGroup>
          <FormGroup row>
            <Label for="examplePassword" sm={3}>Password</Label>
            <Col sm={9}>
              <Input type="password" name="Password" id="examplePassword" value={this.state.fields.Password} onChange={this.handleChange} />
              <div style={{fontSize: 12, color: "red"}}>
                {this.state.errors.Password}
              </div>
            </Col>
          </FormGroup>
          <FormGroup row>
            <Label for="exampleSelect" sm={3}>Konfirmasi</Label>
            <Col sm={9}>
              <Input type="password" name="Konfirmasi" id="exampleSelect" value={this.state.fields.Password} onChange={this.handleChange} />
              <div style={{fontSize: 12, color: "red"}}>
                {this.state.errors.Password}
              </div>
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

export default Register;