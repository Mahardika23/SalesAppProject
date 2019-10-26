import React, { useState } from 'react';
import './Navbar.css';
import styled from 'styled-components';
import {
  Collapse,
  Navbar,
  NavbarToggler,
  NavbarBrand,
  Nav,
  NavItem,
  NavLink} from 'reactstrap';

const Styles = styled.div`
  .navbar{
    background-color: #403151;
  }
  .navbar-brand, .navbar-nav , .navbar-link, .navbar-item, .navbar{
    color: #FFFFFF
    ;
  }
`;
  
export const NavigatorBar = () => {
    return(
      <Styles>
        <Navbar expand="lg">
          <NavbarBrand href="/"><b>Sales APP</b></NavbarBrand>
          <Nav className="ml-auto">
              <NavItem><NavLink href="/">Beranda</NavLink></NavItem>
              <NavItem><NavLink href="/aktivitas">Aktivitas</NavLink></NavItem>
              <NavItem><NavLink href="/pesan">Pesan</NavLink></NavItem>
          </Nav>
          <NavbarToggler aria-controls='basic-navbar-nav'/>
          <Collapse id="basic-navbar-nav" navbar>
            <Nav className="ml-auto">
              <NavItem>
                <NavLink href="/login">Login</NavLink>
              </NavItem>
            </Nav>
          </Collapse>
        </Navbar>
      </Styles>
    );
  }