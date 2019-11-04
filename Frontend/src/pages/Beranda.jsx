import React, {Component} from 'react';
import {NavigatorBar} from '../components/Navbar.js'
import SearchPage from '../components/Search';
import './Beranda.css'
import { Container, Row, Col } from 'reactstrap';
import { Card, CardColumns, CardDeck } from 'react-bootstrap';
// import {Carousel} from 'react-bootstrap';
// import {useState} from 'react';
import Axios from 'axios';
// import { Item } from 'react-native-paper/typings/components/List';


class Katalog extends Component {
    constructor(props){
        super(props)
        this.state = {
            items : [],
            isLoaded : false
        }
    }
    componentDidMount = () => {
        Axios.get("http://192.168.1.24:8000/api/showallcatalogbyfilter")
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
        <div>
             { this.state.items.map(item => <Kartu key={item.id}  item={item}/>)}
        </div>
        )
    }
    
}

const Kartu = (props) => { 
    const {item} = props;
    return (
        <Card>
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

// function ControlledCarousel() {
//     const [index, setIndex] = useState(0);
//     const [direction, setDirection] = useState(null);
  
//     const handleSelect = (selectedIndex, e) => {
//       setIndex(selectedIndex);
//       setDirection(e.direction);
//     };
//     return(
//         <Carousel activeIndex={index} direction={direction} onSelect={handleSelect}>
//             <Kartu/>
//         </Carousel>
//     )
// }

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
                            <div>
                                <Row>
                                    <CardColumns>
                                        <Katalog/>
                                    </CardColumns>
                                </Row>
                                {/* <ControlledCarousel/> */}
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
