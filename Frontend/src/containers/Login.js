import React, { useState } from "react";
import { Button, FormGroup, FormControl, FormLabel } from "react-bootstrap";
import "./Login.css";
import logo from '../logo.svg'
import { Link } from 'react-router-dom';


export default function Login(props) {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");

  function validateForm() {
    return username.length > 0 && password.length > 0;
  }

  function handleSubmit(event) {
    event.preventDefault();
  }

  return (
    <div className="Login">
      <h1 ><b>SALES APP</b></h1>
      <img src={logo} alt="Logo" width="300px"></img>
      <h2>Masuk</h2>
      <form onSubmit={handleSubmit}>
        <FormGroup controlId="username" bsSize="large">
          <FormLabel></FormLabel>
          <FormControl
            autoFocus
            type="text"
            value={username}
            onChange={e => setUsername(e.target.value)}
            placeholder="Username"
  
          />
        </FormGroup>
        <FormGroup controlId="password" bsSize="large">
          <FormLabel></FormLabel>
          <FormControl
            value={password}
            onChange={e => setPassword(e.target.value)}
            placeholder="Password"
            type="password"
          />
        </FormGroup>
        <Button href='\' variant ="purple"  disabled={!validateForm()} type="submit" onClick='beranda'>
          Masuk
        </Button>
      </form>
      <div style={{marginTop:10,flexDirection:'row'}}>
        <text href='\lupa' style={{paddingRight: 150, color:'navy', textDecorationLine:'underline'}}>Lupa Password</text>
        <a href='\daftar'><text style={{ color:'black', textDecorationLine:'underline'}}>Daftar</text></a>
      </div>
    </div>
  );
}