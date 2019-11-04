import React, {Component} from 'react';
import {NavigatorBar} from '../components/Navbar.js'
import SearchPage from '../components/Search';
import './Beranda.css'
import { Container, Row, Col } from 'reactstrap';
import { Card, CardColumns, CardDeck } from 'react-bootstrap';
// import {Carousel} from 'react-bootstrap';
// import {useState} from 'react';
import Axios from 'axios';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick"
// import { Item } from 'react-native-paper/typings/components/List';

class SimpleSlider extends React.Component {
  render() {
    var settings = {
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1
    };
    return (
      <Slider {...settings}>
        <div>
                <Katalog/>
        </div>
        <div>
                <Katalog/>
        </div>
      </Slider>
    );
  }
}
class Katalog extends Component {
    constructor(props){
        super(props)
        this.state = {
            items : [],
            isLoaded : false
        }
    }
    componentDidMount = () => {
        Axios.get("http://127.0.0.1:8000/api/showallcatalog")
        .then(res => {
            this.setState({
                items: res.data
                ,isLoaded: true,
            })
            // console.log(res.data) 
            console.log(this.state.items)     
    })};
    render(){
        var {isLoaded, items} = this.state;
        return(
            
            <CardColumns style={{ width: 800 }}> 
                { this.state.items.map(item => <Kartu key={item.id}  item={item}/>)}
            </CardColumns> 
            
        )
    }
    
}

const Kartu = (props) => { 
    const {item} = props;
    return (
        
        <Card style={{ width: 250} }>
            <Card.Body>
                <Card.Text >
                    nama barang : {item.nama_barang} <br />
                    harga barang : {item.harga_barang} <br/>
                    stok : {item.stok_barang}
                </Card.Text>
            </Card.Body>
        </Card> 
        
    )
}

class Beranda extends Component {
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
                            <div className="container">
                                <SimpleSlider/>
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

export default Beranda;
