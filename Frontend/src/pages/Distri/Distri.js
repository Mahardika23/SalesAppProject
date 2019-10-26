

import React, {Component} from 'react';
import {NavigatorBar} from '../../components/Navbar.js'
import SearchPage from '../../components/Search';
import { Container, Row, Col } from 'reactstrap';
import logo from '../../../src/logo.svg'
import './Distri.css'

class Distributor extends Component {
    render(){
        return(
            
            <div>
                <NavigatorBar/>
                <div className="container">
                    <div className="distributor">
                        <text><h1>Nama Distributor</h1></text>
                        <Container >
                                <Row style={{marginTop:'10px'}}>
                                    <Col xs="2"><img src={logo}></img></Col>
                                    <Col xs="3" style={{marginTop:'15px'}}>
                                        <h6>Nama distributor</h6>
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