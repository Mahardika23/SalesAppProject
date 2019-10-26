import React, {Component, useState} from 'react';
import {NavigatorBar} from '../../components/Navbar.js'
import SearchPage from '../../components/Search';
import './produk.css'
import { Container, Row, Col } from 'reactstrap';
import logo from '../../../src/logo.svg'
import cart from '../../assets/images.png'
import Popup from '../../components/Popup'

class Produk extends Component {
    render(){
        return(
            <div style={{backgroundColor:'#E4DFEC'}}>
                <NavigatorBar/>
                <div className="container">
                    <SearchPage/>
                </div>
                <Container>
                        <Row>
                            <Col xs="5" style={{padding:'10px',backgroundColor:'white',textAlign:'center'}}> <h4>Nama Distributor</h4>
                            <Row>
                                <Col xs="3">
                                    <img src={logo}></img>
                                </Col>
                                <Col xs="5"style={{textAlign:'left'}}>
                                    <h5>Nama Produk</h5>
                                    <h5>Harga</h5>
                                    <h5>Stok</h5>
                                </Col>
                                <Col xs="3">
                                    <div ><Popup />
                                     </div>
                                </Col>
                            </Row>
                            </Col>
                            <Col xs="2"></Col>
                            <Col xs="5" style={{padding:'10px',backgroundColor:'white',textAlign:'center'}}> <h4>Nama Distributor</h4>
                            <Row>
                                <Col xs="3">
                                    <img src={logo}></img>
                                </Col>
                                <Col xs="5"style={{textAlign:'left'}}>
                                    <h5>Nama Produk</h5>
                                    <h5>Harga</h5>
                                    <h5>Stok</h5>
                                </Col>
                                <Col xs="3">
                                <div ><Popup />
                                     </div>
                                </Col>
                            </Row>
                            </Col>
                        </Row>
                </Container>
                
                <Container>
                        <Row style={{paddingTop:'30px'}}>
                            <Col xs="5" style={{padding:'10px',backgroundColor:'white',textAlign:'center'}}> <h4>Nama Distributor</h4>
                            <Row>
                                <Col xs="3">
                                    <img src={logo}></img>
                                </Col>
                                <Col xs="5"style={{textAlign:'left'}}>
                                    <h5>Nama Produk</h5>
                                    <h5>Harga</h5>
                                    <h5>Stok</h5>
                                </Col>
                                <Col xs="3">
                                <div ><Popup />
                                     </div>
                                </Col>
                            </Row>
                            </Col>
                            <Col xs="2"></Col>
                            <Col xs="5" style={{padding:'10px',backgroundColor:'white',textAlign:'center'}}> <h4>Nama Distributor</h4>
                            <Row>
                                <Col xs="3">
                                    <img src={logo}></img>
                                </Col>
                                <Col xs="5"style={{textAlign:'left'}}>
                                    <h5>Nama Produk</h5>
                                    <h5>Harga</h5>
                                    <h5>Stok</h5>
                                </Col>
                                <Col xs="3">
                                <div ><Popup />
                                     </div>
                                </Col>
                            </Row>
                            </Col>
                        </Row>
                </Container>

                
                <Container>
                        <Row style={{paddingTop:'30px'}}>
                            <Col xs="5" style={{padding:'10px',backgroundColor:'white',textAlign:'center'}}> <h4>Nama Distributor</h4>
                            <Row>
                                <Col xs="3">
                                    <img src={logo}></img>
                                </Col>
                                <Col xs="5"style={{textAlign:'left'}}>
                                    <h5>Nama Produk</h5>
                                    <h5>Harga</h5>
                                    <h5>Stok</h5>
                                </Col>
                                <Col xs="3">
                                    <div >
                                        <img src={cart} style={{borderRadius:'100px', width:'70px',height:'70px',marginLeft:'20px',marginTop:'20px'}}  ></img>
                                    </div>
                                </Col>
                            </Row>
                            </Col>
                            <Col xs="2"></Col>
                            <Col xs="5" style={{padding:'10px',backgroundColor:'white',textAlign:'center'}}> <h4>Nama Distributor</h4>
                            <Row>
                                <Col xs="3">
                                    <img src={logo}></img>
                                </Col>
                                <Col xs="5"style={{textAlign:'left'}}>
                                    <h5>Nama Produk</h5>
                                    <h5>Harga</h5>
                                    <h5>Stok</h5>
                                </Col>
                                <Col xs="3">
                                    <div >
                                        <img src={cart} style={{borderRadius:'100px', width:'70px',height:'70px',marginLeft:'20px',marginTop:'20px'}}  ></img>
                                    </div>
                                </Col>
                            </Row>
                            </Col>
                        </Row>
                </Container>
            </div>      
        )
    }
}

export default Produk;