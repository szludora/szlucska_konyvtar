import { useState } from "react";
import Button from "react-bootstrap/Button";
import Form from "react-bootstrap/Form";

export default function Urlap(props) {
  const [adat, setAdat] = useState({author: "", title: ""});

  function adatValt(event){
    const masolat={...adat}
    masolat[event.target.id] = event.target.value
    setAdat(masolat)
}
function kuldes(event){
    event.preventDefault()
    props.kuldes(adat)
}

  return (
    <Form onSubmit={kuldes}>
      <Form.Group className="mb-3">
        <Form.Label>Szerző</Form.Label>
        <Form.Control
          type="text"
          value={adat.author}
          id="author"
          placeholder="Szerző neve"
          onChange={adatValt}
        />
      </Form.Group>

      <Form.Group className="mb-3">
        <Form.Label>Cím</Form.Label>
        <Form.Control type="text" id="title" value={adat.title} onChange={adatValt} placeholder="Könyv címe" />
      </Form.Group>
      <Button variant="primary" type="submit">
        Submit
      </Button>
    </Form>
  );
}
