import React, { useState } from 'react';
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import cart from '../assets/images.png'

const Popup = (props) => {
  const {
    buttonLabel,
    className
  } = props;

  const [modal, setModal] = useState(false);

  const toggle = () => setModal(!modal);

  return (
    <div>
      <img src={cart}  style={{borderRadius:'100px', width:'70px',height:'70px',marginLeft:'20px',marginTop:'20px'}} onClick={toggle}>{buttonLabel}</img>
      <Modal isOpen={modal} toggle={toggle} className={className}>
        <ModalHeader toggle={toggle}>Tambah produk ke pesanan?</ModalHeader>
        <ModalBody style={{textAlign:'center'}}>
            <a href='./pesan'><Button color="primary" onClick={toggle}>Ya</Button>{' '}</a>
            <Button color="secondary" onClick={toggle}>Batal</Button>  
        </ModalBody>
        <ModalFooter>
          
        </ModalFooter>
      </Modal>
    </div>
  );
}

export default Popup;