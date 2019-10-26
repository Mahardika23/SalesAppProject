import React, {Component} from 'react';
import {NavigatorBar} from '../components/Navbar.js'
import SearchPage from '../components/Search';
import './Beranda.css'
import { Container, Row, Col } from 'reactstrap';

export class Beranda extends Component {
    render(){
        return(
            <div style={{backgroundColor:'#E4DFEC'}}>
                <NavigatorBar/>
                <div >
                     <div className="container">
                        <SearchPage/>
                    </div>
                    <div  style={{padding:'50px'}} className='content'>
                        <div style={{backgroundColor:''}}>
                            <h2>Katalog Produk</h2>
                            <div>
                                <Container>
                                <Row style={{marginLeft:'100px'}}>
                                   <Col xs='3'className='Produk'>
                                        Produk
                                    </Col>
                                    <Col xs='4' className='Produk'>
                                        Produk
                                    </Col>
                                    <Col xs='3' className='Produk'>
                                        Produk
                                    </Col>
                                </Row>
                                
                                <Row style={{marginLeft:'100px'}}>
                                    <Col xs='3' className='Produk'>
                                        Produk
                                    </Col>
                                    
                                    <Col xs='4' className='Produk'>
                                        Produk
                                    </Col>
                                    <Col xs='3' className='Produk'>
                                        Produk
                                    </Col>
                                </Row>
                                </Container>
                            </div>
                        </div>
                        <div>
                            <h2>Peta Distributor</h2>
                            <div className='peta' >
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        )
    }
}
