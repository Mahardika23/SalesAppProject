

import React, {Component} from 'react';
import {NavigatorBar} from '../../components/Navbar.js'
import SearchPage from '../../components/Search';
import { Container, Row, Col } from 'reactstrap';
import logo from '../../../src/logo.svg'

class Distributor extends Component {
    render(){
        return(
            
            <div>
                <NavigatorBar/>
                <div className="container">
                    <div className="distributor">
                        <text><h1>Nama Distributor</h1></text>
                        <Container>
                                <Row>
                                    <Col xs="2"><img src={logo} style={{marginTop:'10px'}}></img></Col>
                                    <Col xs="3">
                                        <h6>Nama distributors</h6>
                                        <h6>Alamat</h6>       
                                        <h6>No. Telp</h6>
                                        <h6>Deskripsi</h6>
                                    </Col>
                                    <Col xs="5"><SearchPage/></Col>
                                </Row>
                        </Container>
                    </div>
                </div>
            </div>      
        )
    }
}

export default Distributor;