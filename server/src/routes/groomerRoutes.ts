import express from 'express';
import { GroomerController } from '../controllers/groomerController';

const router = express.Router();

router.get('/goomers', GroomerController.getAllGroomers);
router.get('/groomers/:id', GroomerController.getGroomerById);
router.post('/groomers', GroomerController.createGroomer);
router.put('/groomes/:id', GroomerController.updateGroomer);
router.delete('/groomers/:id', GroomerController.deleteGroomer);

export default router;