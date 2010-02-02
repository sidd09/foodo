from django.db import models

# Create your models here.
class Restaurant(models.Model):
    """docstring for Restaurant"""
    name = models.CharField(max_length=200)
    description = models.TextField()
    phone = models.CharField(max_length=32)
    address = models.CharField(max_length=40)
    zip = models.IntegerField()
    city = models.CharField(max_length=30)
    website = models.CharField(max_length=50)
    email = models.EmailField()
    lat = models.IntegerField()
    lng = models.IntegerField()
    created = models.DateTimeField('date created')
    pricegroup = models.IntegerField()
    
    def __unicode__(self):
        return self.name
        
    class Meta:
        ordering = ('name',)
        
class Type(models.Model):
    type = models.CharField(max_length=32)
    restaurants = models.ManyToManyField(Restaurant)
    
    def __unicode__(self):
        return self.type
        
    class Meta:
        ordering = ('type',)
    