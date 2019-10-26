import React, {Component} from 'react';
import { Link } from 'react-router-dom';
import {NavigatorBar} from '../../components/Navbar.js'
import { Container, Row, Col } from 'reactstrap';
import { Button, FormGroup, FormControl, FormLabel } from "react-bootstrap";
import "./Pesan.css"
import { MDBCol, MDBIcon } from "mdbreact";
import logo from '../../logo.svg'

class Pesan extends Component {
    render(){
        return(
            <div style={{backgroundColor:'#E4DFEC'}}>
                <NavigatorBar/>
                <div className="container">
                    <div className='produk'>
                        <h3><Link to='.\distributor'><text style={{color:'black',textDecorationLine:'underline'}}><b>Nama Distributor</b></text></Link></h3>
                        <div >
                            <Container>
                                <Row>
                                    <Col xs="6"></Col>
                                    <Col xs="1"><h5>Total : </h5></Col>
                                    <Col xs="2" style={{textAlign:'right'}}><h5>Rp 13.000.000 </h5></Col>
                                    <Col xs="3"><Button variant='grey' disabled style={{justifyContent:'center' ,width:'250px',marginTop:'-10px'}}>Menunggu Konfirmasi</Button></Col>
                                </Row>
                            </Container>
                        </div>
                        <div>
                            <Container>
                                <Row>
                                    <Col xs="1"><MDBIcon far icon="trash-alt" style={{marginTop:'30px'}}/></Col>
                                    <Col xs="1"><img src={logo} style={{justifyContent:'center',width:'100px',marginLeft:'-50px'}}></img></Col>
                                    <Col xs="3" style={{paddingTop:'10px'}}>
                                        <div>
                                        Nama Produk
                                        </div>
                                        <div>
                                            <p></p>
                                        Harga
                                        </div></Col>
                                        <Col xs="1"><h5 style={{marginTop:'30px'}}>- ___ + </h5></Col>
                                        <Col xs="1"><MDBIcon far icon="trash-alt" style={{marginTop:'30px'}}/></Col>
                                    <Col xs="1"><img src={logo} style={{justifyContent:'center',width:'100px',marginLeft:'-50px'}}></img></Col>
                                    <Col xs="3" style={{paddingTop:'10px'}}>
                                        <div>
                                        Nama Produk
                                        </div>
                                        <div>
                                            <p></p>
                                        Harga
                                        </div></Col>
                                        <Col xs="1"><h5 style={{marginTop:'30px'}}>- ___ + </h5></Col>

                                 </Row>
                            </Container>
                            <Container>
                                <Row>
                                    <Col xs="1"><MDBIcon far icon="trash-alt" style={{marginTop:'30px'}}/></Col>
                                    <Col xs="1"><img src={logo} style={{justifyContent:'center',width:'100px',height:'100px',width:'100px',marginLeft:'-50px'}}></img></Col>
                                    <Col xs="3" style={{paddingTop:'10px'}}>
                                        <div>
                                        Nama Produk
                                        </div>
                                        <div>
                                            <p></p>
                                        Harga
                                        </div></Col>
                                        <Col xs="1"><h5 style={{marginTop:'30px'}}>- ___ + </h5></Col>
                                       < Col xs="1"><MDBIcon far icon="trash-alt" style={{marginTop:'30px'}}/></Col>
                                    <Col xs="1"><img src={logo} style={{justifyContent:'center',width:'100px',height:'100px',width:'100px',marginLeft:'-50px'}}></img></Col>
                                    <Col xs="3" style={{paddingTop:'10px'}}>
                                        <div>
                                        Nama Produk
                                        </div>
                                        <div>
                                            <p></p>
                                        Harga
                                        </div></Col>
                                        <Col xs="1"><h5 style={{marginTop:'30px'}}>- ___ + </h5></Col>
                                 </Row>
                            </Container>
                        </div>
                    </div>
                    <div className='produk'>
                        <h3><Link to='.\distributor'><text style={{color:'black',textDecorationLine:'underline'}}><b>Nama Distributor</b></text></Link></h3>
                        <div >
                            <Container>
                                <Row>
                                    <Col xs="6"></Col>
                                    <Col xs="1"><h5>Total : </h5></Col>
                                    <Col xs="2" style={{textAlign:'right'}}><h5>Rp 1.000.000 </h5></Col>
                                    <Col xs="3"><Button variant='purple' style={{justifyContent:'center' ,width:'250px',marginTop:'-10px'}}>Checkout</Button></Col>
                                </Row>
                            </Container>
                        </div>
                        <div>
                            <Container>
                                <Row>
                                    <Col xs="1"><MDBIcon far icon="trash-alt" style={{marginTop:'30px'}}/></Col>
                                    <Col xs="1"><img src={logo} style={{justifyContent:'center',width:'100px',marginLeft:'-50px'}}></img></Col>
                                    <Col xs="3" style={{paddingTop:'10px'}}>
                                        <div>
                                        Nama Produk
                                        </div>
                                        <div>
                                            <p></p>
                                        Harga
                                        </div></Col>
                                        <Col xs="1"><h5 style={{marginTop:'30px'}}>- ___ + </h5></Col>
                                        <Col xs="1"><MDBIcon far icon="trash-alt" style={{marginTop:'30px'}}/></Col>
                                    <Col xs="1"><img src={logo} style={{justifyContent:'center',width:'100px',marginLeft:'-50px'}}></img></Col>
                                    <Col xs="3" style={{paddingTop:'10px'}}>
                                        <div>
                                        Nama Produk
                                        </div>
                                        <div>
                                            <p></p>
                                        Harga
                                        </div></Col>
                                        <Col xs="1"><h5 style={{marginTop:'30px'}}>- ___ + </h5></Col>

                                 </Row>
                            </Container>
                            <Container>
                                <Row>
                                    <Col xs="1"><MDBIcon far icon="trash-alt" style={{marginTop:'30px'}}/></Col>
                                    <Col xs="1"><img src={logo} style={{justifyContent:'center',width:'100px',height:'100px',width:'100px',marginLeft:'-50px'}}></img></Col>
                                    <Col xs="3" style={{paddingTop:'10px'}}>
                                        <div>
                                        Nama Produk
                                        </div>
                                        <div>
                                            <p></p>
                                        Harga
                                        </div></Col>
                                        <Col xs="1"><h5 style={{marginTop:'30px'}}>- ___ + </h5></Col>
                                       < Col xs="1"><MDBIcon far icon="trash-alt" style={{marginTop:'30px'}}/></Col>
                                    <Col xs="1"><img src={logo} style={{justifyContent:'center',width:'100px',height:'100px',width:'100px',marginLeft:'-50px'}}></img></Col>
                                    <Col xs="3" style={{paddingTop:'10px'}}>
                                        <div>
                                        Nama Produk
                                        </div>
                                        <div>
                                            <p></p>
                                        Harga
                                        </div></Col>
                                        <Col xs="1"><h5 style={{marginTop:'30px'}}>- ___ + </h5></Col>
                                 </Row>
                            </Container>
                        </div>
                    </div>
                </div>
            </div>      
        )
    }
}

export default Pesan;