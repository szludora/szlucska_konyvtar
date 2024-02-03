import Button from "react-bootstrap/Button";
import Form from "react-bootstrap/Form";

export default function Urlap(props) {
  function kuldes() {
    console.log("küldés");
  }
  return (
    <Form onClick={kuldes}>
      <Form.Group className="mb-3">
        <Form.Label>Szerző</Form.Label>
        <Form.Control type="text" placeholder="Szerző neve" />
      </Form.Group>

      <Form.Group className="mb-3">
        <Form.Label>Cím</Form.Label>
        <Form.Control type="text" placeholder="Könyv címe" />
      </Form.Group>
      <Button
        variant="primary"
        type="submit"
        id="urlapSubmit"
        onClick={(event) => event.preventDefault()}
      >
        Submit
      </Button>
    </Form>
  );
}
